document.getElementById('toggle-btn').addEventListener('click', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleIcon = document.getElementById('toggle-icon');
    sidebar.classList.toggle('expand');
    if (sidebar.classList.contains('expand')) {
      toggleIcon.classList.remove('fa-bars');
      toggleIcon.classList.add('fa-bars-staggered');
    } else {
      toggleIcon.classList.remove('fa-bars-staggered');
      toggleIcon.classList.add('fa-bars');
    }
  });