// declaración de objeto para buscador
let object = null

$(document).ready(function(){
    getData()
    async function getData(){
        await getCities()
        await getType()
        await getGoods()
    }    
})

// cities
async function getCities() {
    $.ajax({
        url: 'requests.php?c=gc',
        success:function(data){
            console.log(data);
            data.forEach(element => {
                $('#selectCiudad').append(`
                    <option value="${element.id}">${element.city}</option>
                `);
            });
        },
        error:function(error){
            console.log(error)
        }
    });
}

//type of houses 
async function getType() {
    $.ajax({
        url: 'requests.php?t=gt',
        success:function(data){
            console.log(data);
            data.forEach(element => {
                $('#selectTipo').append(`
                    <option value="${element.id}">${element.house}</option>
                `);
            });
        },
        error:function(error){
            console.log(error)
        }
    });

}

// my Goods
async function getMyGoods() {
    $('#MyGoods').html('')
    $.ajax({
        url: 'requests.php?m=gd',
        success:function(data){
            if (data.length > 0) {
                data.forEach(element => {
                    $('#MyGoods').append(`
                        <div  class="goods-child">
                            <img class="mx-auto" style="margin-right: 10px" src="img/home.jpg" width="200px;" height="200px;" alt="">
                            <div class="goods">
                                <span>Direccion: ${element.address}</span>
                                <span>Ciudad: ${element.city}</span>
                                <span>Telefono: ${element.phone}</span>
                                <span>Codigo postal: ${element.postal_code}</span>
                                <span>Tipo: ${element.house}</span>
                                <span>Precio: ${formatterPrecio.format(element.price)}</span>
                            </div>
                       </div>                    
                    `);
                });
            }else{
                $('#MyGoods').html(`                
                    <div  class="goods-child">
                        <div class="goods">                            
                            <span>No hay Bienes todavia</span>
                        </div>
                    </div> 
                `)
            }            
        },
        error:function(error){
            console.log(error)
        }
    });
}

//goods
async function getGoods() {
    $('#goods').html('')
    $.ajax({
        url: 'requests.php?g=gd',
        success:function(data){
            console.log(data);
            data.forEach(element => {
                $('#goods').append(`
                    <div  class="goods-child">
                        <img class="mx-auto" style="margin-right: 10px" src="img/home.jpg" width="200px;" height="200px;" alt="">
                        <div class="goods">
                            <span>Direccion: ${element.address}</span>
                            <span>Ciudad: ${element.city}</span>
                            <span>Telefono: ${element.phone}</span>
                            <span>Codigo postal: ${element.postal_code}</span>
                            <span>Tipo: ${element.house}</span>
                            <span>Precio: ${formatterPrecio.format(element.price)}</span>
                            <button class="button-save" onclick="saveGood(${element.id})">Guardar</button>
                            <span id="message${element.id}" class="message"></span>
                            <span id="message-error${element.id}" class="message-error"></span>
                        </div>
                   </div>                    
                `);
            });
        },
        error:function(error){
            console.log(error)
        }
    });
}

// save goods
function saveGood(id){
    $.ajax({
        url: 'requests.php?g=sg',
        data: {
            id
        },
        method: "POST",
        success: function (response) {
            console.log(response);
            if (response) {
                $('#message' + id).text('Guardado Correctamente')
                setTimeout(() => {
                    $('#message' + id).text('')                    
                }, 2000);    
            }else{
                $('#message-error' + id).text('Ya ha sido guardado')    
                setTimeout(() => {
                    $('#message-error' + id).text('')                    
                }, 2000);  
            }
        },
        error:function(x,xs,xt){
            window.open(JSON.stringify(x));
        }
    });
}


// search
function searcher() {
    let city = $( "#selectCiudad option:selected" ).val()
    let type = $( "#selectTipo option:selected" ).val()
    if (city !== "" && type !== "") {
        object = {
            city,
            type,  
        }
        paint()
    }else if(city === "" && type === ""){
        getGoods()
    }else{
        $('#search-error').text('Faltan campos para buscar')   
        setTimeout(() => {
            $('#search-error').text('')                    
        }, 2000);
    }
}

function paint() {
    console.log(object);
    $('#goods').html('')

    $.ajax({
        url: 'requests.php?g=sb',
        data: object,
        method: "POST",
        success: function (data) {
            console.log(data);
            if (data.length > 0) {
                data.forEach(element => {
                    $('#goods').append(`
                        <div  class="goods-child">
                            <img class="mx-auto" style="margin-right: 10px" src="img/home.jpg" width="200px;" height="200px;" alt="">
                            <div class="goods">
                                <span>Direccion: ${element.address}</span>
                                <span>Ciudad: ${element.city}</span>
                                <span>Telefono: ${element.phone}</span>
                                <span>Codigo postal: ${element.postal_code}</span>
                                <span>Tipo: ${element.house}</span>
                                <span>Precio: ${formatterPrecio.format(element.price)}</span>
                                <button class="button-save" onclick="saveGood(${element.id})">Guardar</button>
                                <span id="message${element.id}" class="message"></span>
                                <span id="message-error${element.id}" class="message-error"></span>
                            </div>
                    </div>                    
                    `);
                });
            }else{
                $('#goods').html(`                
                    <div  class="goods-child">
                        <div class="goods">                            
                            <span>No exiten bienes</span>
                        </div>
                    </div> 
                `)
            }
        },
        error:function(x,xs,xt){
            window.open(JSON.stringify(x));
        }
    });
}

// format precio
const formatterPrecio = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 0
  })