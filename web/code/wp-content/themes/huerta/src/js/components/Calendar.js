import { Calendar } from '@fullcalendar/core'
import bootstrapPlugin from '@fullcalendar/bootstrap'
import dayGridPlugin from '@fullcalendar/daygrid'
import esLocale from '@fullcalendar/core/locales/es'
import { select } from '../helpers'

const eventsCalendar = () => {
  const calendarEl = document.getElementById('calendar')
  const allEvents = select('.js-all-events').getAttribute('data-events')

  const calendar = new Calendar(calendarEl, {
    plugins: [bootstrapPlugin, dayGridPlugin],
    themeSystem: 'bootstrap',
    initialView: 'dayGridMonth',
    headerToolbar: {
      start: false,
      center: 'title',
      end: false
    },
    titleFormat: {
      month: 'long'
    },
    dayHeaderFormat: {
      weekday: 'narrow'
    },
    eventDidMount: function (info) {
      /* eslint-disable-next-line */
      const tooltip = new Tooltip (info.el, {
        title: info.event._def.title,
        placement: 'top',
        trigger: 'hover',
        container: 'body'
      })
    },
    events: JSON.parse(allEvents),
    locale: esLocale
  })

  calendar.render()
}

export default eventsCalendar
