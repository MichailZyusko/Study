install.packages("pROC")
library("pROC")

students <- data.frame(
  "gender" = c(
    "m",
    "f",
    "m",
    "f",
    "f",
    "f",
    "m",
    "m",
    "m",
    "f",
    "m",
    "m",
    "m",
    "m",
    "m",
    "m"
  ),
  "height" = c(
    145,
    157,
    163,
    163,
    165,
    168,
    169,
    170,
    173,
    175,
    177,
    178,
    180,
    185,
    192,
    200
  )
)

# task_1
students <- students[order(students$height), ]

A <- c()
B <- c()
C <- c()
D <- c()
n <- length(which(students$gender == "m"))
m <- length(which(students$gender == "f"))

for (height in students$height) {
  aa <- length(which(students$height <= height & students$gender == "m"))
  bb <- length(which(students$height > height & students$gender == "m"))
  cc <- length(which(students$height <= height & students$gender == "f"))
  dd <- length(which(students$height > height & students$gender == "f"))

  A <- c(A, aa)
  B <- c(B, bb)
  C <- c(C, cc)
  D <- c(D, dd)
}

Sn <- A / n
Sp <- D / m
One_Sp <- 1 - Sp
Sp_Sn <- Sp + Sn

plot(Sn, One_Sp, type = "b")

# task_2

roc1 <- roc(
  students$gender,
  students$height,
  percent = TRUE,
  partial.auc = c(100, 90),
  ci = TRUE,
  boot.n = 100,
  ci.alpha = 0.9,
  stratified = FALSE,
  plot = TRUE,
  auc.polygon = TRUE,
  max.auc.polygon = TRUE,
  grid = TRUE,
  print.auc = TRUE,
  show.thres = TRUE
)