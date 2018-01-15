
// Preloaded slideshow script- By Jason Moon
// Traducido por filmeo webmaster, http://www.filmeo.net
// Para este script y más, visita http://www.dynamicdrive.com

// COLOCA LA UBICACIÓN DE TUS IMÁGENES AQUÍ...
var Slides = new Array('imagenes/img1.jpg','imagenes/img2.jpg','imagenes/img3.jpg','imagenes/img4.jpg','imagenes/img5.jpg',
'imagenes/img6.jpg','imagenes/img7.jpg','imagenes/img8.jpg','imagenes/img9.jpg','imagenes/img10.jpg',
'imagenes/img11.jpg','imagenes/img12.jpg','imagenes/img13.jpg','imagenes/img14.jpg','imagenes/img15.jpg','imagenes/img16.jpg',
'imagenes/img17.jpg','imagenes/img18.jpg');

//function StartSlideShow() {
   CurrentSlide = -1;
   Slides[0] = CacheImage(Slides[0]);
   SlideReady = true;
   ShowSlide(1);
//}

// NO NECESITAS EDITAR DEBAJO DE ESTA LÍNEA!
function CacheImage(ImageSource) { // TURNS THE STRING INTO AN IMAGE OBJECT
   var ImageObject = new Image();
   ImageObject.src = ImageSource;
   return ImageObject;
}

function ShowSlide(Direction) {
   if (SlideReady) {
      NextSlide = CurrentSlide + Direction;
      // THIS WILL DISABLE THE BUTTONS (IE-ONLY)
      document.SlideShow.Previous.disabled = (NextSlide == 0);
      document.SlideShow.Next.disabled = (NextSlide == (Slides.length-1));    
 if ((NextSlide >= 0) && (NextSlide < Slides.length)) {
            document.images['Screen'].src = Slides[NextSlide].src;
            CurrentSlide = NextSlide++;
            Message = 'Picture ' + (CurrentSlide+1) + ' of ' + Slides.length;
            self.defaultStatus = Message;
            if (Direction == 1) CacheNextSlide();
      }
      return true;
   }
}

function Download() {
   if (Slides[NextSlide].complete) {
      SlideReady = true;
      self.defaultStatus = Message;
   }
   else setTimeout("Download()", 100); // CHECKS DOWNLOAD STATUS EVERY 100 MS
   return true;
}

function CacheNextSlide() {
   if ((NextSlide < Slides.length) && (typeof Slides[NextSlide] == 
'string'))
{ // ONLY CACHES THE IMAGES ONCE
      SlideReady = false;
      self.defaultStatus = 'Downloading next picture...';
      Slides[NextSlide] = CacheImage(Slides[NextSlide]);
      Download();
   }
   return true;
}
   