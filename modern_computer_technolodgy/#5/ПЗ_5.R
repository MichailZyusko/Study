amount <- 200
norm_distribution <- rnorm(amount)

# 1
task_1 <- function() {
  hist(norm_distribution)
}
task_1()


# 2
task_2 <- function() {
  hist(
    norm_distribution,
    col = "red",
    xlab = "x",
    main = "Гистограмма норм. распределенных случайных чисел в интервале [-3,3]"
  )
}
task_2()


# 3
task_3 <- function() {
  plot(
    density(norm_distribution),
    main = "График функции плотности нормального распределения"
  )
}
task_3()


# 4
task_4 <- function() {
  polygon(
    norm_distribution,
    col = "blue"
  )
}
task_4()


# 5
task_5 <- function() {
  x <- rnorm(100)
  qqnorm(
    x,
    xlab = "Теоретические квантилии",
    ylab = "Жксперементальныее квантилии",
    main = "Q-Q график норм. распределенных эмпирических данных"
  )
  qqline(x)
  qqplot(x, dlnorm(x), xlab = "x", ylab = "y")
}
task_5()


# 6
task_6 <- function() {
  dotchart(
    longley$Armed.Forces,
    labels = longley$Year,
    xlab = "Численность военнослужащих ВС США, тыс. чел.",
    main = "Численность военнослужащих ВС США, тыс. чел."
  )
}
task_6()


# 7
task_7 <- function() {
  barplot(
    height = longley$Armed.Forces,
    name = longley$Year,
    ylab = "Численность военнослужащих ВС США, тыс. чел.",
    xlab = "Год",
    main = "Численность военнослужащих ВС США, тыс. чел."
  )
}
task_7()


# 8
task_8 <- function() {
  teachers <- c(45, 31, 28, 56, 24, 12)
  labels <- c(
    "физический", "математический", "химический",
    "информатики", "биологический", "философский"
  )

  sum <- sum(teachers)
  percent_teachers <- round(teachers * 100 / sum, 2)
  labels <- paste(labels, " ", percent_teachers, "%")

  pie(teachers, labels = labels)
}
task_8()


# 9
task_9 <- function() {
  data <- c(1, 3, 5, 4, -15, 8, 11, 4, 7, 23)
  boxplot(data)
}
task_9()


# 10
task_10 <- function(num_count = 100) {
  plot(rnorm(num_count, mean = 2, sd = 1), type = "l", col = "green")
}
par(mfrow = c(3, 2))
task_10()
task_10(500)
task_10(1000)
task_10(10000)
task_10(100000)
task_10(1000000)