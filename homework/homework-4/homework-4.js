//Question 6
const cats = [
    {
        name: 'Charlie',
        adoptionStatus: 'available'
    },
    {
        name: 'Lily',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Coco',
        adoptionStatus: 'available'
    },
    {
        name: 'Oreo',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Luna',
        adoptionStatus: 'available'
    },
    {
        name: 'Milo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lola',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Leo',
        adoptionStatus: 'available'
    },
    {
        name: 'Willow',
        adoptionStatus: 'available'
    },
    {
        name: 'Bella',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Max',
        adoptionStatus: 'available'
    },
    {
        name: 'Cleo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lucy',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Daisy',
        adoptionStatus: 'available'
    },
];

let result = [];

for (let i = 0; i < cats.length; i++)
{
    if (cats[i].adoptionStatus == 'available')
    {
        result.push(cats[i].name);
    }
}

result.join(',');
let msg = "Congrats! you have now adopted " + result;

var replace = document.getElementById('Q6');
replace.textContent = msg;

//Question 7
let ranNum = Math.random() * 10;
const ternaryValue = ranNum > 5 ? 'greater than five!' : 'less than five!';

msg = "The random number is " + ranNum + " which is " + ternaryValue;
replace = document.getElementById('Q7');
replace.textContent = msg;

//Question 8
for(const property in cats) {
    console.log(property)
    console.log(cats[property])
}

//Question 9
if(1 == '1')
    console.log('true');
else
    console.log('false');


if(1 === '1')
    console.log('true');
else
    console.log('false');

//Qestion 10
const cats2 = cats.map(function (cat)
{
    return cat.name + ' is cute'
})

replace = document.getElementById('Q10');
replace.textContent = cats2;
