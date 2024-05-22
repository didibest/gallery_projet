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


// استهداف جميع العناصر التي تحتوي على الفئة 'im'
let images = document.querySelectorAll('.im');

// تعيين الأنيميشن المبدئي لجميع الصور
images.forEach((image) => {
    image.style.opacity = '0';
    image.style.transform = 'translateX(-50px)'; // يمكنك تعديل القيمة لتحقيق تأثير مختلف
    image.style.transition = 'all 0.5s ease-in-out'; // تعيين التوقيت الافتراضي للأنيميشن
});

// إنشاء كائن IntersectionObserver لمراقبة العناصر
let observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateX(0px)'; // إرجاع الصورة إلى وضعها الطبيعي
            observer.unobserve(entry.target); // إيقاف المراقبة بعد تفعيل الأنيميشن
        }
    });
}, {
    threshold: 0.5 // تعيين عتبة الرؤية 10%
});

// مراقبة كل صورة
images.forEach(image => {
    observer.observe(image);
});

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