


function popularity (arr,ppltyCondition){
    let popular_products=[];
    for (let i = 0 ;i<arr.length;i++){
        if (arr[i][2]>ppltyCondition){
            popular_products[popular_products.length]=arr[i]
            
        }

    }
    return popular_products;
}   

function sort_by_price(unsorted){
    let sorted=false;
    let temp = [];
    while(!sorted){
        sorted=true;
        for (let i=0;i<(unsorted.length-1);i++){
            if(unsorted[i][1]>unsorted[i+1][1]){
                sorted=false;
                temp = unsorted[i];
                unsorted[i] =unsorted[i+1];
                unsorted[i+1] = temp;
            }
        }
    }
    return unsorted;
}


function under_Budget(budget,products){
    let newBudget = budget;
    let inBudget = [];
    for (let i=0;i<products.length;i++){
        if(newBudget>products[i][1]){
            newBudget = newBudget - products[i][1];
            inBudget[inBudget.length] = products[i];
        }
        else{
            break;
        }
    }
    return inBudget;
}

// products ex 2

let products = [
    ["a", 30, 1200],
    ["b", 20, 2500],
    ["c", 15, 1800],
    ["d", 40, 3000],
    ["e", 10, 900],
    ["f", 25, 2000]
];
let budget = 100;
let popularityCondition= 1500;

popular_products = popularity(products,popularityCondition);
sorted_products = sort_by_price(popular_products);
inBudget = under_Budget(budget,sorted_products);

console.log(`popular products :` ,sorted_products);
console.log(`you can buy: `,inBudget,` items :`,inBudget.length);

/// videos  ex 3


let videos = [
    ["a", 5, 1200],
    ["b", 2, 2500],
    ["c", 1, 1800],
    ["d", 3, 3000],
    ["e", 12, 2000],
    ["f", 3, 2000]
];
let time = 10;
let popularityVideo= 2000;

popular_videos = popularity(videos,popularityVideo);
sorted_videos = sort_by_price(popular_videos);
inTime = under_Budget(time,sorted_videos);

console.log(`popular videos :` ,sorted_videos);
console.log(`you can watch: `,inTime,` Amount :`,inTime.length);