// Loading all tasks
var fs = require('fs');
var tasks = fs.readdirSync('./gulp-tasks/');

tasks.forEach(function(task) {
  require('./gulp-tasks/' + task);
});
