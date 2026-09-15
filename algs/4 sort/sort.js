
//  loop in arr chaning the the 2 index close to eachother if they need 2 

function loopMethode(arr){
    let loop = true;
    let temp = 0;
    while (loop){
        loop = false;
        for (let i=0;i<(arr.length-1);i++){
            if(arr[i]>arr[i+1]){
                loop = true;
                temp = arr[i];
                arr[i]= arr[i+1];
                arr[i+1]=temp;
            }
        }
    }
    return arr;
}
list = [1,343,4,4,213,32,456,56];
console.log(loopMethode(list));