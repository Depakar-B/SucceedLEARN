document.addEventListener("DOMContentLoaded", function(){

    const cards = document.querySelectorAll(".sl-home-solution-card");


    const observer = new IntersectionObserver((entries)=>{

        entries.forEach((entry)=>{

            if(entry.isIntersecting){

                cards.forEach(card =>{

                    card.classList.remove("active");

                });


                entry.target.classList.add("active");

            }

        });

    },{
        threshold:0.50
    });


    cards.forEach((card)=>{

        observer.observe(card);

    });

});
