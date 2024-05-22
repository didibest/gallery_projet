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
  





let box1 = document.querySelector(".box1");



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
    

}  
    //################################


    const menuIcon = document.querySelector('.menu-icon');
    const ulElement = document.querySelector('.box1 ul');
    
    menuIcon.addEventListener('click', () => {
      ulElement.classList.toggle('active');
      menuIcon.classList.toggle("active");
    });
    
   //************************ */
   document.getElementById('submitBtn').addEventListener('click', function() {
    // إعادة تحميل صفحة contact.php بعد النقر على الزر "Submit"
    window.location.href = 'index2.php';
});