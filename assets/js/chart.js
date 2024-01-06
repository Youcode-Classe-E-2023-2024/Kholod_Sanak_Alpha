
$(document).ready(function () {
    // Fetch both posts and users data
    $.when(
        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            dataType: 'json'
        }),
        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/users',
            dataType: 'json'
        })
    ).done(function (postsData, usersData) {
        const postsNumber = postsData[0].length;
        const usersNumber = usersData[0].length;

        // Create a bar chart
        const options = {
            chart: {
                type: 'bar',
                height: 200
            },
            series: [{
                name: 'Posts',
                data: [postsNumber]
            }, {
                name: 'Users',
                data: [usersNumber]
            }],
            xaxis: {
                categories: ['Posts', 'Users']
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }).fail(function (error) {
        console.error('Error fetching data:', error);
        // Handle error (e.g., display an error message)
    });
});