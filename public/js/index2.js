// index.js
function toggleSidebar() {
    var sidebar = document.getElementById("mySidebar");
    var main = document.getElementById("main");
  
    if (sidebar.style.width === "250px") {
      // Close the sidebar
      sidebar.style.width = "0";
      main.style.marginLeft = "0";
    } else {
      // Open the sidebar
      sidebar.style.width = "250px";
      main.style.marginLeft = "250px";
    }
  }
  
  function closeNav() {
    var sidebar = document.getElementById("mySidebar");
    var main = document.getElementById("main");
  
    // Close the sidebar
    sidebar.style.width = "0";
    main.style.marginLeft = "0";
  }
  