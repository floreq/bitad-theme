// Convert date format to custom time
// e.g. Wed Jan 01 2020 8:00:00 GMT+0100 -> 8:00
const dateToTimelineTime = (d) => {
  const h = d.getHours();
  const m = d.getMinutes();
  return `${h}:${m < 10 ? "0" + m : m}`;
};

// Convert custom time to date format
// e.g. 8:00 -> Wed Jan 01 2020 8:00:00 GMT+0100
const timelineTimeToDate = (t) => {
  const splitT = t.split(":");
  const d = new Date(2020, 0, 1, Number(splitT[0]), Number(splitT[1]));
  return d;
};

// e.g. 8:00-9:00 -> ["8:00", "9:00"]
const splitTimeIntoStartAndEnd = (t) => {
  const splitT = t.split("-");
  return splitT;
};

const eventPosition = (countReferenceDate, countDateTo) => {
  const referenceH = countReferenceDate.getHours();
  const referenceM = countReferenceDate.getMinutes();
  const negateDay = new Date(countDateTo); // Zanegowanie znaczenia daty (dzien, miesiac, rok nie powinny miec znaczenia)
  negateDay.setHours(referenceH);
  negateDay.setMinutes(referenceM);
  return (countDateTo - negateDay) / 600000 + 1;
};

// Create timeline event
const event = (event, startTimelineTime, location) => {
  // Create event wrapper
  const eventNode = document.createElement("div");
  eventNode.classList.add("bitad-timeline-event");
  // Clone orginal event node from list of events
  const eventImage = event.body
    .querySelector(".bitad-event-credentials")
    .cloneNode(true);
  // Set location by using CSS Grid
  const gridColumnStart = eventPosition(
    startTimelineTime,
    timelineTimeToDate(splitTimeIntoStartAndEnd(event.time)[0])
  );
  const gridColumnEnd = eventPosition(
    startTimelineTime,
    timelineTimeToDate(splitTimeIntoStartAndEnd(event.time)[1])
  );
  eventNode.style.gridColumnStart = gridColumnStart;
  eventNode.style.gridColumnEnd = gridColumnEnd;
  // Add style of start/ending when event exceeds timeline time
  if (gridColumnStart < 0) {
    eventNode.classList.add("bitad-timeline-break-right");
  } else if (gridColumnEnd > 27 + 1) {
    eventNode.classList.add("bitad-timeline-break-left");
  }
  eventNode.appendChild(eventImage);
  location.appendChild(eventNode);
};

const setTimelineEvents = (events, startTimelineTime, location) => {
  const timelineEvents = document.createElement("div");
  timelineEvents.classList.add("bitad-timeline-events");

  events.forEach((e) => {
    event(e, startTimelineTime, timelineEvents);
  });
  location.appendChild(timelineEvents);
};

// Split (sort) events based on event time
const timeDistribution = (times, events) => {
  let timeDistribution = [
    {
      groupedId: 1,
      startTimelineTime: new Date("Wed Jan 01 2020 8:00:00 GMT+0100"), // 8:00
      endTimelineTime: new Date("Wed Jan 01 2020 12:30:00 GMT+0100"), // 12:30
      timedEvents: [],
    },
    {
      groupedId: 2,
      startTimelineTime: new Date("Wed Jan 01 2020 12:30:00 GMT+0100"), // 12:30
      endTimelineTime: new Date("Wed Jan 01 2020 17:00:00 GMT+0100"), // 17:00
      timedEvents: [],
    },
    {
      groupedId: 3,
      startTimelineTime: new Date("Wed Jan 01 2020 17:00:00 GMT+0100"), // 17:00
      endTimelineTime: new Date("Wed Jan 01 2020 21:30:00 GMT+0100"), // 21:30
      timedEvents: [],
    },
  ];
  // If event doesn't has time, doesn't get distributed
  times.forEach((e, i) => {
    // Get time from event
    // e.g. 8:00
    eventTime = e.textContent;
    const eventData = {
      time: eventTime,
      body: events[i],
    };
    for (let i = 0; i < timeDistribution.length; i++) {
      // Split event time and convert it to date from
      if (
        timelineTimeToDate(splitTimeIntoStartAndEnd(eventTime)[0]) <
          timeDistribution[i].endTimelineTime &&
        timelineTimeToDate(splitTimeIntoStartAndEnd(eventTime)[1]) <=
          timeDistribution[i].endTimelineTime
      ) {
        timeDistribution[i].timedEvents.push(eventData);
        break;
      } else if (
        timelineTimeToDate(splitTimeIntoStartAndEnd(eventTime)[0]) <
        timeDistribution[i].endTimelineTime
      ) {
        timeDistribution[i].timedEvents.push(eventData);
      }
    }
  });
  return timeDistribution;
};

// Create timeline time bars
const setTimelineTimes = (startTimelineTime, endTimelineTime, location) => {
  // Create timeline times wrapper
  const timelineTimes = document.createElement("div");
  timelineTimes.classList.add("bitad-timeline-times");

  let startDate = startTimelineTime.getTime();
  const endDate = endTimelineTime.getTime();
  let times = [];
  // Create times beetwen startTimelineTime to endTimelineTime
  for (startDate; startDate <= endDate; startDate += 30 * 60000) {
    times.push(dateToTimelineTime(new Date(startDate)));
  }
  times.map((e, i) => {
    // Creatine holder for time
    const timeNode = document.createElement("span");
    // Proper separating times in grid via gridColumn style
    i *= 2;
    let gridColumnStart = i;
    let gridColumnEnd = i + 2;
    // Adding style
    timeNode.style.gridColumnStart = gridColumnStart;
    timeNode.style.gridColumnEnd = gridColumnEnd;
    // Addint text (time) and appending to timeline times wrapper
    timeNode.innerText = e;
    timelineTimes.appendChild(timeNode);
  });
  location.appendChild(timelineTimes);
};

const timeline = (id) => {
  // Get timeline wrapper
  const timelineScroll = document.querySelector(
    `${id}-timeline > .bitad-timeline-scroll`
  );
  // Get data for timeline events distribution
  const times = document.querySelectorAll(
    `${id} .bitad-event-coordinate > div:last-child > p`
  );
  // Get events from grid list
  const events = document.querySelectorAll(`${id} .bitad-event`);
  // Distribution and placing events
  timeDistribution(times, events).forEach((e) => {
    if (e.timedEvents.length > 0) {
      setTimelineTimes(e.startTimelineTime, e.endTimelineTime, timelineScroll);
      setTimelineEvents(e.timedEvents, e.startTimelineTime, timelineScroll);
    }
  });
};
