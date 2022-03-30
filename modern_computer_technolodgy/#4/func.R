beta <- function(vecX, vecY) {
  b1 <- beta1(vecX, vecY)
  b0 <- mean(vecY) - b1 * mean(vecX)

  return(c(b0, b1))
}

beta1 <- function(vecX, vecY) {
  b1 <- sum((vecX - mean(vecX)) *
    (vecY - mean(vecY))) /
    sum((vecX - mean(vecX))^2)
  return(b1)
}

graphHuble <- function(tabHub, b1) {
  ggplot(data = tabHub, aes(x = x)) +
    geom_point(aes(y = y, size = 0.1)) +
    geom_line(aes(y = x * b1), color = "red", size = 1) +
    labs(
      title = "������� ������",
      x = "���������� �� ��������, ���",
      y = "�������� �������� ��������,��/c"
    )
}