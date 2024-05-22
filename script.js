function setActiveElement(element) {
    // إزالة الكلاس "active" من جميع العناصر
    const elements = document.querySelectorAll('ul a');
    for (const element of elements) {
      element.classList.remove("active");
    }
  
    // إضافة الكلاس "active" إلى العنصر المُحدد
    element.classList.add("active");
  }
  
  // مثال لاستخدام الدالة
  const elements = document.querySelectorAll('ul a');
  
  for (const element of elements) {
    element.addEventListener("click", () => {
      setActiveElement(element);
    });
  }
  

// في ملف السكريبت الخاص بك (script.js)
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('modal');
  const modalImage = document.getElementById('modalImage');
  const closeBtn = document.getElementById('closeBtn');
  const artic =document.querySelector('article');

  const imElements = document.querySelectorAll('.box3 .ele .im');
  imElements.forEach((imElement) => {
      imElement.addEventListener('click', function () {
          const imagePath = this.querySelector('img').src;
          openModal(imagePath);
      });
  });

  closeBtn.addEventListener('click', closeModal);

  function openModal(imagePath) {
      modalImage.src = imagePath;
      modal.classList.add('active');
      artic.classList.add('act');
  }

  function closeModal() {
      modal.classList.remove('active');
      artic.classList.remove('act');
  }
});


let box1 = document.querySelector(".box1");
let im1 = document.querySelector(".im1");
let im2 = document.querySelector(".im2");
let im3 = document.querySelector(".im3");
let im4 = document.querySelector(".im4");
let im5 = document.querySelector(".im5");
let im6 = document.querySelector(".im6");
let im7 = document.querySelector(".im7");

im1.style.opacity = ('0');
im2.style.opacity = ('0');
im3.style.opacity = ('0');
im4.style.opacity = ('0');
im5.style.opacity = ('0');
im6.style.opacity = ('0');
im7.style.opacity = ('0');

window.onscroll = function (){
  if(scrollY >= 40){
    box1.style.background="rgba(243, 243, 243,0.7)";
    box1.style.backdropFilter="blur(5px)";
    box1.style.boxShadow="13px 0px 15px rgba(0, 0, 0, 0.3)"
    box1.style.transition="0.2s";
    }else{
        box1.style.background="rgb(243, 243, 243)";
        box1.style.backdropFilter="blur(0px)";
        box1.style.boxShadow="none"
    }
    if(scrollY >= 100){
      im1.style.opacity = ('1');
      im1.style.transition = ('all 0.3s');
      im1.style.transform = ('translateX(0px)');
      im2.style.opacity = ('1');
      im2.style.transition = ('all 0.7s');
      im2.style.transform = ('translateX(0px)');
      im3.style.opacity = ('1');
      im3.style.transition = ('all 1s');
      im3.style.transform = ('translateX(0px)');
    }
    if(scrollY >= 650){
      im4.style.opacity = ('1');
      im4.style.transition = ('all 0.3s');
      im4.style.transform = ('translateX(0px)');
      im5.style.opacity = ('1');
      im5.style.transition = ('all 0.7s');
      im5.style.transform = ('translateX(0px)');
    }
    if(scrollY >= 1200){
      im6.style.opacity = ('1');
      im6.style.transition = ('all 0.3s');
      im6.style.transform = ('translateX(0px)');
      im7.style.opacity = ('1');
      im7.style.transition = ('all 0.7s');
      im7.style.transform = ('translateX(0px)');
    }

}  
    //################################


    const menuIcon = document.querySelector('.menu-icon');
    const ulElement = document.querySelector('.box1 ul');
    
    menuIcon.addEventListener('click', () => {
      ulElement.classList.toggle('active');
      menuIcon.classList.toggle("active");
    });
    
   //##############//
   //function boto(){
  //  menuIcon.classList.toggle("active");
 // }