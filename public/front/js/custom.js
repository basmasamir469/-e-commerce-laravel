let bar=document.getElementById('bars')
let menu=document.getElementById('menu')
let close=document.querySelector(".fa-x")
let mobileMenu=document.getElementById("bar")
bar.addEventListener('click',function(){
    menu.classList.toggle("active")
mobileMenu.classList.toggle("active")

})
close.addEventListener('click',function(){
    menu.classList.remove("active")
    mobileMenu.classList.remove("active")
})