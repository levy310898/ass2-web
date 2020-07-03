console.log("js check");

// edit button event
$('.data-edit').click(e=>{
    let textvalues = displayData(e);
    
    let id = $("#productId");
    let title = $("#productTitle");
    let desc = $("#productDesc");
    let type = $("#productType");
    let price = $("#productPrice");
    let img = $("#productImg");
    id.val(textvalues[0]);
    title.val(textvalues[1]);
    desc.val(textvalues[2]);
    type.val(textvalues[3]);
    price.val(textvalues[4]);
    img.val(textvalues[5]);
    console.log("hello img");
    document.getElementById("imgDataInput").src =textvalues[5].trim();
})

function displayData(e){
    console.log('check displayData');
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
            console.log(value.textContent);
            textvalues[id++]= value.textContent;
        }
    }
    return textvalues;
}