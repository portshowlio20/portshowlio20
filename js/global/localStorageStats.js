window.addEventListener("load", function () {
  // const button = document.querySelector("#clear-local");
  const main = document.querySelector("main");
  const totalProjects = 106;
  const totalStudents = 53;
  const projectsProgressBar = document.querySelector(".stat-projects .bar");
  const projectsPercentage = document.querySelector(".stat-projects .percent");
  const projectsNumber = document.querySelector(".stat-projects .num");
  const studentsProgressBar = document.querySelector(".stat-students .bar");
  const studentsPercentage = document.querySelector(".stat-students .percent");
  const studentsNumber = document.querySelector(".stat-students .num");

  let studentsArray = localStorage.getItem("students")
    ? JSON.parse(localStorage.getItem("students"))
    : [];
  let projectsArray = localStorage.getItem("projects")
    ? JSON.parse(localStorage.getItem("projects"))
    : [];

  const studentsData = JSON.parse(localStorage.getItem("students"));
  const projectsData = JSON.parse(localStorage.getItem("projects"));

  function addTallyToLocalStorage(item, itemArray) {
    localStorage.setItem(item, JSON.stringify(itemArray));

    itemArray.indexOf(main.dataset.id) === -1
      ? itemArray.push(main.dataset.id)
      : null;
    localStorage.setItem(item, JSON.stringify(itemArray));
  }

  if (main.getAttribute("id") == "student-profile") {
    // console.log("student page");
    addTallyToLocalStorage("students", studentsArray);
    handleData("students", studentsData);
  }

  if (main.classList.contains("project-page")) {
    // console.log("project page");
    addTallyToLocalStorage("projects", projectsArray);
    handleData("projects", projectsData);
  }

  function handleData(item, data) {
    if (data) {
      if (item === "students") {
        // console.log("students", data.length);
        const percentageStew = Math.floor((data.length / totalStudents) * 100);
        studentsProgressBar.style.left = `${percentageStew}%`;
        studentsPercentage.innerHTML = percentageStew;
        studentsNumber.innerHTML = data.length;
      } else if (item === "projects") {
        // console.log("projects", data.length);
        const percentageProj = Math.floor((data.length / totalProjects) * 100);
        projectsProgressBar.style.left = `${percentageProj}%`;
        projectsPercentage.innerHTML = percentageProj;
        projectsNumber.innerHTML = data.length;
      }
    }
  }

  handleData("students", studentsData);
  handleData("projects", projectsData);
});
