export default function init(selector=null){
    const context = selector || document;
    var controllers = document.querySelectorAll('amount-controller');

    for(controller of controllers){
        controller.addEventListener('click',({target})=>{
            const controlador = target;
            const operation = parseInt(controlador.dataset.sign);
            const amountCounter = controlador.parentNode.querySelector('amount-counter');
            let newValue = parseInt(amountCounter.innerText)+operation
            amountCounter.innerText = newValue;
            console.log(controlador,amountCounter)
        })
    }
}

// modules.export = init;