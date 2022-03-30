# 1
task_1 <- function() {
  sum <- 0
  for (i in seq(1, 100, 2)) sum <- sum + i

  return(sum)
}
task_1()

# 2
task_2 <- function() {
  m <- matrix(
    c(
      0, 1, 0, 1, 0, 0,
      1, 0, 0, 0, 1, 0,
      0, 0, 0, 0, 0, 1,
      1, 0, 0, 0, 0, 0,
      0, 1, 0, 0, 0, 0,
      0, 0, 1, 0, 0, 0
    ),
    nrow = 6,
    ncol = 6
  )
  w <- m
  for (k in 1:nrow(m)) {
    for (i in 1:nrow(m)) {
      for (j in 1:nrow(m)) {
        w[i, j] <- w[i, j] | (w[i, k] & w[k, j])
      }
    }
  }

  return(w)
}
task_2()

# 3
task_3 <- function(a1 = 1, a2 = 1) {
  fib <- c(a1, a2)
  i <- 3
  while (TRUE) {
    if (a1 + a2 > 100) break

    fib[i] <- a1 + a2
    a1 <- a2
    a2 <- fib[i]
    i <- i + 1
  }

  return(fib)
}
task_3()


# 4
task_4 <- function(per, deposit) {
  start_deposit <- deposit
  years <- 0

  repeat {
    if (deposit > (start_deposit * 2)) {
      return(paste0("При ", per, "% вклад удвоиться за ", years, " лет"))
    }

    deposit <- deposit + (deposit * (per / 100))
    years <- years + 1
  }
}
task_4(4, 100)
task_4(8, 100)