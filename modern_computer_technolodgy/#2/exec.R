source("./ПЗ_2.R")

table <- task_1("tab1.txt")
table

x <- c(1, 3, 20, 50, 100)

task_2(x, my_func = function(x) log10(x))
task_2(my_func = function(x) 2 * x^3 - 4 * x^2 + 3 * x - 8)

my_line <- task_3(1, 1, 2, 2)
my_line(3)

task_4()

task_5(v = c(5, 10), e = 1, fun = function(x) log10(x))
task_5(v = c(-3, 1), e = 1, fun = function(x) (2 * sin(x)))