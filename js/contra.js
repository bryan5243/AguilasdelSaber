function showPassword() {
    var x = document.getElementsByClassName("password")[0];
    var icon= document.getElementsByClassName("icon")[0];
    
    if (x.type === "password") {
      x.type = "text";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    } else {
      x.type = "password";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    }
  }
  