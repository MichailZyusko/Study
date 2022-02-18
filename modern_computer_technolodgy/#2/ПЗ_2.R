# 1
task_1 <- function(file_name) {
  table <- read.table(
    file_name,
    header = TRUE,
    sep = "",
    check.names = FALSE,
    row.names = 1,
    "binary"
  )
  return(table)
}

# 2
task_2 <- function(x = NULL, from = -5, to = 5, h = 1, my_func) {
  if (length(x)) {
    y <- my_func(x);
  } else {
    x <- seq(from, to, h)
    y <- my_func(x);
  }

  plot(x, y, type = "b")
}

# 3
task_3 <- function(x1, y1, x2, y2) {
  k <- (y2 - y1) / (x2 - x1)
  b <- y1 - (x1 * (y2 - y1)) / (x2 - x1)

  return(function(x) {
    plot(x, x * k + b)
    return(x * k + b)
  })
}

# 4
func <- function(interval, f) {
  return(f(interval))
}

task_4 <- function(a = 1, b = 1, c = 1, d = 1, e = 1, g = 1) {
  y <- c(
    func(seq(-2, 3, e), function(x) a * x^2 + b * x + c),
    func(seq(4, 7, e),  function(x) task_3(3, a * 3^2 + b * 3 + c, 8, d * exp(g * 8))(x)),
    func(seq(8, 10, e), function(x) d * exp(g * x))
  )

  plot(seq(-2, 10, e), y, type = "b")
}

# 5
task_5 <- function(v = c(-100, 100), e = 1, fun = function(x) log10(x)) {
  x <- seq(v[1], v[2], by = e)
  y <- task_2(x = x, my_func = fun)
  return(y)
}