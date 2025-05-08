/*
  Add custom scripts here
*/
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
// Pour l'heure uniquement :
flatpickr("#availability_time", {
  enableTime: true,
  noCalendar: true,
  dateFormat: "H:i",
});
