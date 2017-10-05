Morris.Donut({
  element: 'graph',
  data: [
    {value: 9.0, label: 'Steven'},
    {value: 7.0, label: 'Mario'},
    {value: 6.0, label: 'Maria'},
    {value: 6.0, label: 'Carlos'}
  ],
  formatter: function (x) { return x + ".0" }
}).on('click', function(i, row){
  console.log(i, row);
});