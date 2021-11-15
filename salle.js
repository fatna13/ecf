 
// burger

let burgerMenu = function(){
  let burger = document.querySelector(".burger");
  let menuresponsive = document.querySelector(".menuresponsive");   

  burger.addEventListener("click", function(){
      console.log("hello")
      menuresponsive.classList.toggle("burger-active");
      burger.classList.toggle("toggle");
  })
}
burgerMenu();


