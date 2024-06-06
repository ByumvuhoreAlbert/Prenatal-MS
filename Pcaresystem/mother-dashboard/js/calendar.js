const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  
  const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  
  const calendar = document.querySelector(".calendar");
  const header = document.querySelector(".header");
  const monthYear = document.getElementById("monthYear");
  const prevMonthBtn = document.getElementById("prevMonth");
  const nextMonthBtn = document.getElementById("nextMonth");
  const daysContainer = document.querySelector(".days");
  
  let currentDate = new Date();
  let currentMonth = currentDate.getMonth();
  let currentYear = currentDate.getFullYear();
  
  prevMonthBtn.addEventListener("click", () => {
    currentMonth--;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    }
    renderCalendar();
  });
  
  nextMonthBtn.addEventListener("click", () => {
    currentMonth++;
    if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    renderCalendar();
  });
  
  function renderCalendar() {
    monthYear.textContent = `${months[currentMonth]} ${currentYear}`;
    daysContainer.innerHTML = "";
  
    // Display days of the week
    daysOfWeek.forEach(day => {
      const dayElement = document.createElement("div");
      dayElement.classList.add("day");
      dayElement.textContent = day;
      daysContainer.appendChild(dayElement);
    });
  
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  
    // Calculate the index of the first day of the month
    const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();
  
    // Render blank squares for the days before the first day of the month
    for (let i = 0; i < firstDayIndex; i++) {
      const dayElement = document.createElement("div");
      dayElement.classList.add("day");
      daysContainer.appendChild(dayElement);
    }
  
    // Render days of the month
    for (let i = 1; i <= daysInMonth; i++) {
      const dayElement = document.createElement("div");
      dayElement.classList.add("day");
      dayElement.textContent = i;
      if (i === currentDate.getDate() && currentMonth === currentDate.getMonth() && currentYear === currentDate.getFullYear()) {
        dayElement.classList.add("current-date");
      }
      daysContainer.appendChild(dayElement);
    }
  }
  
  renderCalendar();
  