const modal = document.getElementById("imgModal");
const modalImg = document.getElementById("modalImg");

document.querySelectorAll(".examImg").forEach(img => {

    img.addEventListener("click", () => {
        modal.style.display = "flex";
        modalImg.src = img.src;
    });

});

document.querySelector(".close").addEventListener("click", () => {
    modal.style.display = "none";
});
modal.addEventListener("click", (e)=>{
    if(e.target === modal){
        modal.style.display = "none";
    }
})