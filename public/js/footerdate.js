// Obtener el año actual basado en el horario de Ciudad de México
const currentDate = new Date().toLocaleString("en-US", { timeZone: "America/Mexico_City" });
const year = new Date(currentDate).getFullYear();

// Insertar el año en el footer
document.getElementById("currentYear").textContent = year;
