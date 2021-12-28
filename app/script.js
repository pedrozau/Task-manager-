
function opened(){

const open = document.getElementById('open')
const modalContainer = document.getElementById('modal-container')

 modalContainer.style.opacity = 1
 modalContainer.style.pointerEvents = "auto"

}

function opened1(){

  const open = document.getElementById('open1')
  const modalContainer = document.getElementById('modal-container1')
  
   modalContainer.style.opacity = 1
   modalContainer.style.pointerEvents = "auto"
  
  }
  

function closed(){

 const close = document.querySelector("#close")
 const modaContainer = document.querySelector("#modal-container")

   modaContainer.style.opacity = 0
   modaContainer.style.pointerEvents = "none"


}

function closed1(){

  const close = document.querySelector("#close")
  const modaContainer = document.querySelector("#modal-container1")
 
    modaContainer.style.opacity = 0
    modaContainer.style.pointerEvents = "none"
 
 
 }
 


function myFunction(){
  
  let popup  = document.querySelector('#myPopup')
   
  popup.classList.toggle('show')

}


function myFunctions(){

 
  let popups  = document.querySelector('#myPopups')
   
  popups.classList.toggle('show')



}


function nivo(){

let  nivel = document.querySelector('#envoy').value 
let   showMe = document.getElementById('nivel')

if (nivel == 10) {

  showMe.style.visibility = "visible"

}else if(nivel == 11){
   showMe.style.visibility ="visible"
}else if(nivel == 12){

  showMe.style.visibility = "visible"
}else {
    
  showMe.style.visibility = "hidden"

}



}


function buscar(){


  let vi = document.getElementById('visivel')

  vi.style.visibility = "hidden"



}





