$(document).ready(function(){
    $(".NavBtn").click(function(){
        $(".NavBtn").animate({
            height: '1366px',
            width: '100%',

            
        });

  



        $(".NavBtn").css("background-color", "#F8F8FF");
        $(".NavBtn").css("z-index", "2");
        $(".NavBtn").css("transition", "none");
        $(".NavBtn").css("transition", "transform .5s");
        $(".NavBtn").css("transform","rotate(360deg)");
        $(".NavBtn").css("margin-top", "0px");
        $(".NavBtn").css("margin-left", "0px");
        $(".NavBtn").css("border-radius", "50%");
        $("#cl-effect-10").css("display", "inline");
        $(".backNav").css("display", "inline");
        $(".NavBtn").css("position", "fixed");

        });
        $(".backNav").click(function(){
         
        
        $(".NavBtn").css("transition", "transform .5s, border-radius .5s,  background-color .5s"),
        
      
        $(".NavBtn").animate({
            height: '50px',
            width: '50px',
            
        });


      

       /* $(".NavBtn").css("width", "50px");
        $(".NavBtn").css("height", "50px");  */
        $(".NavBtn").css("margin-top", "10px");
        $(".NavBtn").css("margin-left", "10px");
        $(".backNav" ).css("display", "none");
        $("#cl-effect-10").css("display", "none");
        $(".NavBtn").css("border-radius", "10px");
        $(".NavBtn").css("position", "relative");

       

         $(".NavLink").click(function()
         {
             $()

         });
        /*(".NavBtn").mouseover(function(){
               $(".NavBtn").css("transition", "width .5s, height .5s, transform .5s, border-radius .5s,  background-color .5s"),
        	    $(this).css("height", "100px"),
        	    $(this).css("width", "100px"),
        	    $(this).css("border-radius", "50px"),
        	    $(this).css("background-color", "#0cebeb"),
        	    $(this).css("transform", "rotate(180deg)")

        });

        $(".NavBtn").mouseout(function(){
        	 $(".NavBtn").css("transition", "width .5s, height .5s, transform .5s, border-radius .5s,  background-color .5s"),
        	    $(this).css("height", "50px"),
        	    $(this).css("width", "50px"),
        	    $(this).css("border-radius", "10px"),
        	    $(this).css("background-color", "#fdbb2d"),
        	    $(this).css("transform", "rotate(0deg)")

        });
        */
  
   });



     
     $("img#normalMonk").mouseover(function() {
  $(this).css("display","none"),
  $("#smileMonk").css("display", "inline")
});

   $( "img#smileMonk" ).mouseout(function() {

   	$(this).css("display", "none"),
  $( "#normalMonk" ).css("display", "inline")

});
 

});
 




    


  var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid grey}";
        document.body.appendChild(css);
    };
