function toggle() {
    var map = document.querySelector("#map").style;
    var sidebar_ul = document.querySelector("#sidebar_ul").style
    var sidebar_li = document.querySelectorAll("#sidebar_li")

    if (sidebar_ul.width === "220px") {
        sidebar_ul.width = "0px";
        sidebar_ul.transition = "0.4s all ease";
  
      for (var i = 0; i < sidebar_li.length; i++) {
        sidebar_li[i].style.opacity = "0%";
        sidebar_li[i].style.transition = "0.4s all ease";
        sidebar_li[i].style.display = "none";
      }
      
      map.filter = "blur(0px)";
      map.transition = "0.4s all ease";

      list.filter = "blur(0px)";
      list.transition = "0.4s all ease";

    } else {
      sidebar_ul.width = "220px";
      sidebar_ul.transition = "0.4s ease";
  
      for (var i = 0; i < sidebar_li.length; i++) {
        sidebar_li[i].style.opacity = "100%";
        sidebar_li[i].style.transition = "0.4s all ease";
        sidebar_li[i].style.display = "block";
      }
  
      map.filter = "blur(2px)";
      map.transition = "0.4s all ease";

      list.filter = "blur(2px)";
      list.transition = "0.4s all ease";

    }
  }
  