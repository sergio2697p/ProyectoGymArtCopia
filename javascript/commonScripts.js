window.addEventListener("load", function(){
   setInterval(function(){mostrarhora(); },1000);
   // mostrarScroll();
    ajustarArticle();
});

function mostrarhora(){ 
if(!screen.width<= 785){
    var f=new Date();
    var hora = f.getHours();
    var minutos =f.getMinutes();
    var segundos = f.getSeconds();
   
    if(hora>=10 && minutos >=10 && segundos >=10 ){
            cad=hora+":"+f.getMinutes()+":"+f.getSeconds();
        }else{
            if(hora<=10 && minutos >=10 && segundos >=10){
             cad="0"+hora+":"+f.getMinutes()+":"+f.getSeconds();   
            }
             if(hora>=10 && minutos <=10 && segundos >=10){
             cad=hora+":0"+f.getMinutes()+":"+f.getSeconds();
            }
             if(hora>=10 && minutos >=10 && segundos <=10){
             cad=hora+":"+f.getMinutes()+":0"+f.getSeconds();
            }
            if(hora<=10 && minutos <=10 && segundos >=10){
             cad="0"+hora+":0"+f.getMinutes()+":"+f.getSeconds();
            }
            if(hora<=10 && minutos >=10 && segundos <=10){
             cad="0"+hora+":"+f.getMinutes()+":0"+f.getSeconds();
            }
            if(hora<=10 && minutos <=10 && segundos <=10){
             cad="0"+hora+"0"+f.getMinutes()+":0"+f.getSeconds();
            }
                        
        } 
document.getElementById('horaActual').innerHTML = cad;
}else{
   document.getElementById('horaActual').innerHTML = ""; 
}
}

function mostrarScroll(){
    
    var divScroll = document.getElementById("article");
    var rectScroll = document.getElementById("formList").getBoundingClientRect();
    var rectFooter = document.getElementById("footer").getBoundingClientRect();
    if(rectScroll.top + rectScroll.height >= rectFooter.top){
       $(divScroll).css("overflow", "scroll");
    }else{
        return null;
    }
    
}

function ajustarArticle(){
    var rectScroll = document.getElementById("article");
    var rectFooter = document.getElementById("footer").getBoundingClientRect();
    var rectHeader = document.getElementById("header").getBoundingClientRect();
    var heightArticle = rectFooter.top - rectHeader.height;
    $(rectScroll).height(heightArticle);    
    
}