# 1
install.packages("gamair")
library(gamair)

head(hubble)

plot(hubble$x, hubble$y,
     xlab = "Расстояние, Мпс",
     ylab = "Скорость, км/с",
     main = "Постоянная Хаббла",
     type = "p"
)

b1 <- sum((hubble$x - mean(hubble$x)) * (hubble$y - mean(hubble$y))) /
     sum((hubble$x - mean(hubble$x))^2)
b0 <- mean(hubble$y) - b1 * mean(hubble$x)

lm(y ~ x, data = hubble)

install.packages("ggplot2")
library("ggplot2")

ggplot(data = hubble, aes(x = x)) +
     geom_point(aes(y = y, size = 0.1)) +
     geom_line(aes(y = x * b1), color = "red", size = 1) +
     labs(
          title = "Функция Хаббла",
          x = "Расстояние до галактик, Мпс",
          y = "Скорость удаления галактик, км/с"
     )

rsss <- sum((hubble$y - (b0 + b1 * hubble$x))^2)


znac <- 1 / (b1 / (3.09 * 10^19))
ysec <- 60^2 * 24 * 365

sigma <- 100 - (znac / ysec / 1000000000) / 13.798 * 100

# 2
source("func.R")

vec_beta <- beta(hubble$x, hubble$y)
graphHuble(hubble, vec_beta[2])

year <- 1 / (vec_beta[2] / (3.09 * 10^19))
maxyear <- year / ysec
sigma <- 100 - (maxyear / 1000000000 / 13.798 * 100)