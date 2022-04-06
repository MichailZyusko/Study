install.packages("pROC")
library("pROC")

roc1 <- roc(
  Control1$Gr,
  Control1$proBPN,
  percent = TRUE,
  partial.auc = c(100, 90),
  partial.auc.correct = TRUE,
  partial.auc.focus = "sens",
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