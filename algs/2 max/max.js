//function based
function Max(arr) {
    let max = arr[0];
    for (let i = 1; i < arr.length; i++) {
        if (arr[i] > max) {
            max = arr[i];
        }
    }
    return max;
    }
    
    let arr1 = [1, 2, 3, 4, 14, 6, 7, 8, 9, 10];
    
    console.log(Max(arr1)); 
    
    // straight code
    arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    let max2 = arr1[0];
    for (let i = 1; i < arr1.length; i++) {
        if (arr1[i] > max2) {
            max2 = arr1[i];
        }
    }
    console.log(max);