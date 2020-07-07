console.log("js check");

// edit button event
$('.data-edit').click(e=>{
    let textvalues = displayData(e);
    let tableName = $('#tableName').text().toLowerCase();

    console.log("tablename= " +tableName);
    if(tableName.includes('product')){
        console.log('this is product page');
        getProductData(textvalues);
    }else if(tableName.includes('idea')){
        console.log('this is idea page');
        getIdeaData(textvalues);
    }
    
})

function displayData(e){
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
            if($(value).find("img").length){

                textvalues[id++] = $(value).find("img").attr("src");
            }else{
                textvalues[id++]= value.textContent;
            }
            
        }
    }
    return textvalues;
}

function getTypeString(type){
    switch(type){
        case 1:
            return "Sơn nội thất";
        case 2:
            return "Sơn ngoại thất";
        case 3:
            return "Bột trét tường";
        case 4:
            return "Dụng cụ sơn";
    }


}

function getSelectedOption(type){
    let options = $("#inputType option");
    for(let option of options){
        if($(option).attr('selected')){
            // $(option).attr("value",type);
            $(option).val(type);
            $(option).text(getTypeString(type));
        }
    }
}

function getProductData(textvalues){
    let id = $("#inputId");
    let title = $("#inputTitle");
    let desc = $("#inputDesc");
    let type = $("#inputType");
    let price = $("#inputPrice");
    let img = $("#inputImg");
    getSelectedOption(parseInt(textvalues[3]));
    id.val(textvalues[0]);
    title.val(textvalues[1]);
    desc.val(textvalues[2]);
    type.val(textvalues[3]);
    price.val(textvalues[4]);
    img.val(textvalues[5]);
    console.log("hello img");
    document.getElementById("imgDataInput").src =textvalues[5].trim();
}

function getIdeaData(textvalues){
    let id = $("#inputId");
    let title = $("#inputTitle");
    let content = $("#inputContent");
    let img = $("#inputImg");
    id.val(textvalues[0]);
    title.val(textvalues[1]);
    content.val(textvalues[2]);
    img.val(textvalues[3]);
    document.getElementById("imgDataInput").src =textvalues[3].trim();
}