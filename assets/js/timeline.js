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
  const gridColumnStart = eventPosition(
    startTimelineTime,
    timelineTimeToDate(splitTimeIntoStartAndEnd(event)[0])
  );
  const gridColumnEnd = eventPosition(
    startTimelineTime,
    timelineTimeToDate(splitTimeIntoStartAndEnd(event)[1])
  );

  const eventNode = document.createElement("div");
  eventNode.classList.add("bitad-timeline-event");
  eventNode.style.gridColumnStart = gridColumnStart;
  eventNode.style.gridColumnEnd = gridColumnEnd;
  eventNode.textContent = event;
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
const timeDistribution = (events) => {
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
  events.forEach((e) => {
    // Get time from event
    // e.g. 8:00
    eventTime = e.textContent;
    for (let i = 0; i < timeDistribution.length; i++) {
      // Split event time and convert it to date from
      if (
        timelineTimeToDate(splitTimeIntoStartAndEnd(eventTime)[0]) <
          timeDistribution[i].endTimelineTime &&
        timelineTimeToDate(splitTimeIntoStartAndEnd(eventTime)[1]) <=
          timeDistribution[i].endTimelineTime
      ) {
        timeDistribution[i].timedEvents.push(eventTime);
        break;
      } else if (
        timelineTimeToDate(splitTimeIntoStartAndEnd(eventTime)[0]) <
        timeDistribution[i].endTimelineTime
      ) {
        timeDistribution[i].timedEvents.push(eventTime);
      }
    }
  });
  return timeDistribution;
};

// Create timeline time bars
const setTimelineTimes = (startTimelineTime, endTimelineTime, location) => {
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
    // Proper separating times in grid via gridColumn style
    i *= 2;
    let gridColumnStart = i;
    let gridColumnEnd = i + 2;
    // Creatine holders for times and appending them to timeline time bar
    const timeNode = document.createElement("span");
    timeNode.style.gridColumnStart = gridColumnStart;
    timeNode.style.gridColumnEnd = gridColumnEnd;
    timeNode.innerText = e;
    timelineTimes.appendChild(timeNode);
  });
  location.appendChild(timelineTimes);
};

function timeline(id) {
  const times = document.querySelectorAll(
    `${id} .bitad-event-coordinate > div:last-child > p`
  );
  const timelineScroll = document.querySelector(
    `${id}-timeline > .bitad-timeline-scroll`
  );
  timeDistribution(times).forEach((e) => {
    if (e.timedEvents.length > 0) {
      setTimelineTimes(e.startTimelineTime, e.endTimelineTime, timelineScroll);
      setTimelineEvents(e.timedEvents, e.startTimelineTime, timelineScroll);
    }
  });
}

if (document.readyState === "loading") {
  // Loading hasn't finished yet
  // document.addEventListener("DOMContentLoaded", timeline("#lectures"));
} else {
  // `DOMContentLoaded` has already fired
  // timeline("#lectures");
}
