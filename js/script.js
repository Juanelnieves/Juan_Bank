document.getElementById('sidebarToggle').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    var mainContent = document.getElementById('mainContent');
    var sidebarToggle = document.getElementById('sidebarToggle');
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('full-width');
    if (sidebar.classList.contains('collapsed')) {
      sidebarToggle.style.left = '0';
    } else {
      sidebarToggle.style.left = '280px';
    }
  });