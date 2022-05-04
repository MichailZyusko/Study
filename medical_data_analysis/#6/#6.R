vec <- c(4, 5, 6, 7, 9, 10, 11, 12, 13)

# 1-3
task_1 <- function(v) {
  mean_type <- c()
  mean_full <- c()
  p_value <- c()
  for (i in v) {
    temp_mean_type <- round(tapply(ThreeGroups[, i], ThreeGroups$DD, mean), 2)
    temp_mean_full <- round(mean(ThreeGroups[, i]), 2)
    test_shapiro <- shapiro.test(ThreeGroups[, i])

    mean_full <- c(mean_full, temp_mean_full)
    mean_type <- rbind(mean_type, temp_mean_type)
    p_value <- c(p_value, test_shapiro$p.value)
  }

  result_table <- cbind(mean_full, mean_type)
  result_table <- cbind(result_table, p_value)
  colnames(result_table) <- c(
    "Нар. рел", "Псевдон",
    "Рестрик", "Все", "p-Value"
  )
  rownames(result_table) <- c(
    "ММЛЖ", "ИММЛЖ", "ЛП", "ТМЖП",
    "ГД ВТЛЖ", "КСР", "КДР", "СДЛА", "Е/Еа"
  )
  return(result_table)
}

result_table <- task_1(vec)
result_table

# 4
task_4 <- function(v) {
  p_adj <- c()
  for (i in v) {
    test <- aov(ThreeGroups[, i] ~ ThreeGroups$DD, data = ThreeGroups)
    tukey_test <- TukeyHSD(test)
    p_value <- tukey_test[[1]]
    p_adj <- rbind(p_adj, p_value[, 4])
  }
  colnames(p_adj) <- c(
    "Псевдон ~ Нар. рел",
    "Рестрик ~ Нар. рел",
    "Рестрик ~ Псевдон"
  )
  rownames(p_adj) <- c(
    "ММЛЖ", "ИММЛЖ", "ЛП",
    "ТМЖП", "ГД ВТЛЖ", "КСР",
    "КДР", "СДЛА", "Е/Еа"
  )
  return(p_adj)
}

p_adj_tukey <- task_2(vec)
p_adj_tukey

# 5
install.packages("FSA")
library("FSA")

task_5_1 <- function(v) {
  p_adj_danna <- c()
  for (i in v) {
    test <- dunnTest(
      ThreeGroups[, i] ~ ThreeGroups$DD,
      data = ThreeGroups, method = "bonferroni"
    )
    p_adj_danna <- rbind(p_adj_danna, test[[2]]$P.adj)
  }
  colnames(p_adj_danna) <- c(
    "Нар. рел ~ Псевдон",
    "Нар. рел ~ Рестрик",
    "ПсевÍдон ~ Рестрик"
  )
  rownames(p_adj_danna) <- c(
    "ММЛЖ", "ИММЛЖ", "ЛП",
    "ТМЖП", "ГД ВТЛЖ", "КСР",
    "КДР", "СДЛА", "Е/Еа"
  )
  return(p_adj_danna)
}

task_5_2 <- function(v) {
  p_un_adj_danna <- c()
  for (i in v) {
    test <- dunnTest(
      ThreeGroups[, i] ~ ThreeGroups$DD,
      data = ThreeGroups, method = "bonferroni"
    )
    p_un_adj_danna <- rbind(p_un_adj_danna, test[[2]]$P.unadj)
  }
  colnames(pUnAdjDanna) <- c(
    "Нар. рел ~ Псевдон",
    "Нар. рел ~ Рестрик",
    "Псевдон ~ Рестрик"
  )
  rownames(pUnAdjDanna) <- c(
    "ММЛЖ", "ИММЛЖ", "ЛП",
    "ТМЖП", "ГД ВТЛЖ", "КСР",
    "КДР", "СДЛА", "Е/Еа"
  )
  return(p_un_adj_danna)
}

p_adj_danna <- task_5_1(vec)
p_adj_danna
p_un_adj_danna <- task_5_2(vec)
p_un_adj_danna
# 6
task_6 <- function(v) {
  mtrx_cor <- c()
  vec_nar <- which(ThreeGroups$DD == "нар рел")
  vec_pcev <- which(ThreeGroups$DD == "рестрик")
  vec_rest <- which(ThreeGroups$DD == "псевдон")
  for (i in v) {
    a <- cor(ThreeGroups[vec_nar, 13],
      ThreeGroups[vecNar, i],
      method = "pearson"
    )
    b <- cor(ThreeGroups[vec_pcev, 13],
      ThreeGroups[vecPcev, i],
      method = "pearson"
    )
    c <- cor(ThreeGroups[vec_rest, 13],
      ThreeGroups[vecRest, i],
      method = "pearson"
    )
    d <- cor(ThreeGroups[, 13],
      ThreeGroups[, i],
      method = "pearson"
    )

    mtrx_cor <- rbind(mtrx_cor, c(a, b, c, d))
  }
  colnames(mtrx_cor) <- c(
    "Нар. рел", "Псевдон",
    "Рестрик", "Все"
  )
  rownames(mtrx_cor) <- c(
    "ММЛЖ", "ИММЛЖ", "ЛП",
    "ТМЖП", "ГД ВТЛЖ", "КСР",
    "КДР", "СДЛА", "Е/Еа"
  )
  return(mtrx_cor)
}

mtrx_cor <- task_6(vec)
mtrx_cor