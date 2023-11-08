const galleryContainer = document.querySelector('.galleryContainer');
const jumbo = document.querySelector('.jumbo');

galleryContainer.addEventListener('click', changeImage);

function changeImage(e) {
    //cek apakah yang diklik adalah thumb
    if(e.target.className == 'thumb')
    {
        jumbo.src = e.target.src;
    }
}