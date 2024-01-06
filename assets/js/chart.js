
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
        //console.error('Error fetching data:', error);
    });
});

    $(document).ready(function(){
    // Fetch data from the URL
    $.get('https://jsonplaceholder.typicode.com/posts', function(data){
        // Process the data to count posts per user
        var userPosts = {};
        data.forEach(function(post){
            if(userPosts[post.userId]){
                userPosts[post.userId]++;
            } else {
                userPosts[post.userId] = 1;
            }
        });

        // Prepare data for ApexCharts
        var chartData = Object.keys(userPosts).map(function(userId){
            return {
                x: 'User ' + userId,
                y: userPosts[userId]
            };
        });

        // Create ApexCharts
        var options = {
            chart: {
                type: 'area'
            },
            series: [{
                name: 'Posts',
                data: chartData
            }],
            xaxis: {
                categories: chartData.map(function(item){ return item.x; })
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    });
});
