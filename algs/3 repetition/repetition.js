let arr = [4,7,4,2,7,7];
let reps = [];

let isIncluded = false;

for (let i = 0; i < arr.length; i++) {
    
    for(let x = 0 ; x< reps.length;x++){
        if(reps[x]==arr[i]){
            isIncluded =true;
            break;
        }
    }
        if (!isIncluded){
            for(let y = 1;y<arr.length;y++){
                if (arr[i] == arr[y] && i!==y){
                    reps[reps.length]=arr[i];
                    isIncluded = false;
                    break;
                }
            }
        }
}
console.log(reps)


// function and methods
function repetition(arr2){
    let reps2 =[];
    for (let i = 0; i < arr2.length; i++) {
    if (reps2.includes(arr2[i])){
    }
    else{
        for(let t = 1;t<arr2.length;t++){
                if (arr2[i] == arr2[t] && i!==t){
                    reps2.push(arr2[i]);
                    break;
                }
            }
        }
    }
    return reps2;
}
console.log(repetition(arr));