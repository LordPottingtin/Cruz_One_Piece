//this is the file I intially wanted to import for ChartJS chart build on home.html
//was not coorperating with me and instead had to add directly into the home.html itself (not ideal)

const labels = [];
const ratings = [];
const votes = [];

/**
 * dependant on getData() function 
 **/
createBarChart();
createPieChart();

    async function createBarChart(){
        //wait for getData to finish and then use the data from the getData function
        await getData();

        /**
         * taken from:
         * https://stackoverflow.com/questions/1960473/get-all-unique-values-in-a-javascript-array-remove-duplicates 
         * 
         * removes duplicates from the years' label 
         **/
        function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;   
            }
        var a = labels;
        var unique = a.filter(onlyUnique);
        //code edited from Chartjs.org example
        const ctx = document.getElementById('myBarChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: unique,
                datasets: [{
                    label: 'Average Rating of One Piece Episodes Per Year',
                    data: ratings,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    async function createPieChart(){
        await getData();

        /**
         * taken from:
         * https://stackoverflow.com/questions/1960473/get-all-unique-values-in-a-javascript-array-remove-duplicates
         * 
         * ideally would not want top use function this way, should have made an outside funcitno and called in
         **/
        function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;   
            }
        const a = labels;
        const unique = a.filter(onlyUnique);
        //code edited from Chartjs.org example
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Data','Not','Cooperating', 'Using', 'Test', 'Istead'],
                datasets: [{
                    label: '# of Episodes Per Year',
                    data: [10, 20, 30, 25, 70, 5],
                    backgroundColor: [
                        'rgba(255, 8, 0, .2)',
                        'rgba(255, 61, 0, .2)',
                        // 'rgba(130, 5, 132, .2)',
                        // 'rgba(255, 151, 0, .2)',
                        // 'rgba(126, 3, 99, .2)',
                        'rgba(252, 255, 0, .2)',
                        // 'rgba(194, 255, 0, .2)',
                        // 'rgba(151, 255, 0, .2)',
                        // 'rgba(49, 122, 4, .2)',
                        // 'rgba(49, 73, 43, .2)',
                        // 'rgba(5, 253, 7, .2)',
                        // 'rgba(5, 168, 54, .2)',
                        // 'rgba(2, 246, 162, .2)',
                        'rgba(126, 3, 53, .2)',
                        // 'rgba(2, 208, 246, .2)',
                        // 'rgba(2, 147, 246, .2)',
                        // 'rgba(2, 106, 246, .2)',
                        // 'rgba(2, 61, 246, .2)',
                        'rgba(2, 10, 246, .2)',
                        // 'rgba(40, 2, 246, .2)',
                        // 'rgba(101, 2, 246, .2)',
                        // 'rgba(132, 2, 246, .2)',
                        'rgba(203, 2, 246, .2)'
                    ],
                    borderColor: [
                        'rgba(255, 8, 0, 1)',
                        'rgba(255, 61, 0, 1)',
                        // 'rgba(130, 5, 132, 1)',
                        // 'rgba(255, 151, 0, 1)',
                        // 'rgba(126, 3, 99, 1)',
                        'rgba(252, 255, 0, 1)',
                        // 'rgba(194, 255, 0, 1)',
                        // 'rgba(151, 255, 0, 1)',
                        // 'rgba(49, 122, 4, 1)',
                        // 'rgba(49, 73, 43, 1)',
                        // 'rgba(5, 253, 7, 1)',
                        // 'rgba(5, 168, 54, 1)',
                        // 'rgba(2, 246, 162, 1)',
                        'rgba(126, 3, 53, 1)',
                        // 'rgba(2, 208, 246, 1)',
                        // 'rgba(2, 147, 246, 1)',
                        // 'rgba(2, 106, 246, 1)',
                        // 'rgba(2, 61, 246, 1)',
                        'rgba(2, 10, 246, 1)',
                        // 'rgba(40, 2, 246, 1)',
                        // 'rgba(101, 2, 246, 1)',
                        // 'rgba(132, 2, 246, 1)',
                        'rgba(203, 2, 246, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }); 
    }

/**
 * only works when ran with python -m HTTP.SERVER 
 * have not figured out why or how to 100% everything together
 * 
 * mentioned in another comment, but perhaps should have parsed and 
 * written into a mySQL db on phpMyAdmin instead
 **/
async function getData(){
    const response = await fetch("../data/one_piece.csv");
    const data = await response.text();
    // console.log(data);

    const table = data.split('\n').slice(1);
    table.forEach(element => {
        const column = element.split(/,(?=(?:(?:[^"]*"){2})*[^"]*$)/);
        // const rankLow = column[1];
        // const trend = column[2];
        // const season = column[3];
        // const episode = column[4];
        // const name = column[5];
        const year = column[6];
        labels.push(year);
        const totalVotes = column[7];
        votes.push(totalVotes);
        const averageRating = column[8];
        ratings.push(averageRating);
    })
}

//outputs the content of the text file
// const data = require('../data/one_piece.json');
// console.log(data);

/*
fetch("file://C:\\Users\\Ryan\\xampp\\htdocs\\Code_projects\\Cruz_project\\Chipotle\\data\\one_piece.json")
  .then(response => response.json())
  .then(json => console.log(json));

d3.csv(filename).then(function(loadedData){

    console.log(loadedData);

});
*/