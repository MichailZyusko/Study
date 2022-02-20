txt2table <- function(path = "DK.txt") {
  tb <- data.frame(read.table(path, header = TRUE, sep = "\t"))

  # Возраст
  age <- table(tb$Age.Gr, tb$Count > 2)[-1, ]
  age_median <- c(
    median(tb[which(tb$Count < 3), 1], na.rm = TRUE),
    median(tb[which(tb$Count > 2), 1], na.rm = TRUE)
  )

  age_comporation <- c(
    gsub("x", round(age[1, 1] / (age[3, 1] + age[4, 1]), 2), "x:1"),
    gsub("x", round(age[1, 2] / (age[3, 2] + age[4, 2]), 2), "x:1")
  )

  age <- rbind(age, age_median)
  age <- rbind(age, age_comporation)

  # Пол
  # sex_comporation <- table(tb$Sex, tb$Count > 2)[-1, ]
  # x1 <- c(
  #   paste0("1:", round(sex_comporation[1, 1] / sex_comporation[2, 1], 2)),
  #   paste0("1:", round(sex_comporation[1, 2] / sex_comporation[2, 2], 2))
  # )

  # x <- which(tb$Age.Gr == "18-22")
  # sex_comporation <- table(tb$Sex[x], tb$Count[x] > 2)[-1, ]
  # x2 <- c(
  #   paste0("1:", round(sex_comporation[1, 1] / sex_comporation[2, 1], 2)),
  #   paste0("1:", round(sex_comporation[1, 2] / sex_comporation[2, 2], 2))
  # )

  # x <- which(tb$Age.Gr == "31-40" | tb$Age.Gr == "41-50")
  # sex_comporation <- table(tb$Sex[x], tb$Count[x] > 2)[-1, ]
  # x3 <- c(
  #   paste0("1:", round(sex_comporation[1, 1] / sex_comporation[2, 1], 2)),
  #   paste0("1:", round(sex_comporation[1, 2] / sex_comporation[2, 2], 2))
  # )

  # ultratable <- data.frame(
  #   t(data.frame("муж/жен" = x1, "муж/жен 18-22" = x2, "муж/жен 31-50" = x3))
  # )

  # Вес
  # weight <- table(tb$Weight, tb$Count > 2)[-1, ]

  # weight_median <- c(
  #   median(tb[which(tb$Count < 3), 3], na.rm = TRUE),
  #   median(tb[which(tb$Count > 2), 3], na.rm = TRUE)
  # )
  # weight <- rbind(weight, weight_median)
  # print(weight)


  # ИМТ
  bmi <- c(
    round(mean(tb[which(tb$Count < 3), 5], na.rm = TRUE), 2),
    round(mean(tb[which(tb$Count > 2), 5], na.rm = TRUE), 2)
  )

  # Проживание
  localization <- table(tb$Localization, tb$Count > 2)[-1, ]

  # Семейное положение
  m_status <- table(tb$Mstatus, tb$Count > 2)[-1, ]

  x <- which(tb$Sex == "муж")
  male_status <- table(tb$Mstatus[x], tb$Count[x] > 2)[-1, ]

  y <- which(tb$Sex == "жен")
  female_status <- table(tb$Mstatus[y], tb$Count[y] > 2)[-1, ]

  # m_status <- round(male_status / female_status, 2)

  # Образование
  education <- table(tb$Education, tb$Count > 2)[-1, ]
  education_compare <- c(
   gsub(
     "x",
     round(
      education[1, 1] /
     (education[2, 1] +
      education[3, 1] +
      education[4, 1])
    , 2), "x:1"),
   gsub(
     "x",
     round(
      education[1, 2] /
     (education[2, 2] +
      education[3, 2] +
      education[4, 2])
    , 2), "x:1"
   )
  )
  education <- rbind(education, education_compare)

  # Социальный статус
  status <- table(tb$Status, tb$Count > 2)[-1, ]

  # Уровень дохода
  income <- table(tb$Income, tb$Count > 2)[-1, ]

  result <- age
  result <- rbind(result, c("Возраст", "Возраст"))
  # result <- rbind(result, ultratable)
  result <- rbind(result, c("Пол", "Пол"))
  result <- rbind(result, bmi)
  result <- rbind(result, c("Индекс массы тела", "Индекс массы тела"))
  result <- rbind(result, localization)
  result <- rbind(result, c("Проживание", "Проживание"))
  result <- rbind(result, male_status)
  result <- rbind(result, c("Мужчины", "Мужчины"))
  result <- rbind(result, female_status)
  result <- rbind(result, c("Женщины", "Женщины"))
  result <- rbind(result, m_status)
  result <- rbind(result, c("Семейное положение", "Семейное положение"))
  result <- rbind(result, education)
  result <- rbind(result, c("Образование", "Образование"))
  result <- rbind(result, status)
  result <- rbind(result, c("Социальный статус", "Социальный статус"))
  result <- rbind(result, income)
  result <- rbind(result, c("Уровень доходов", "Уровень доходов"))

  colnames(result) <- c("Less then 3", "More then 2")

  # age_18_22_1 <- length(which(df$Age.Gr == "18-22" & df$Count < 3))
  # age_23_30_1 <- length(which(df$Age.Gr == "23-30" & df$Count < 3))
  # age_31_40_1 <- length(which(df$Age.Gr == "31-40" & df$Count < 3))
  # age_41_50_1 <- length(which(df$Age.Gr == "41-50" & df$Count < 3))
  # age_51_60_1 <- length(which(df$Age.Gr == "51-60" & df$Count < 3))

  # age_18_22_2 <- length(which(df$Age.Gr == "18-22" & df$Count > 2))
  # age_23_30_2 <- length(which(df$Age.Gr == "23-30" & df$Count > 2))
  # age_31_40_2 <- length(which(df$Age.Gr == "31-40" & df$Count > 2))
  # age_41_50_2 <- length(which(df$Age.Gr == "41-50" & df$Count > 2))
  # age_51_60_2 <- length(which(df$Age.Gr == "51-60" & df$Count > 2))


  # median_1 <- median(df[which(df$Count < 3), 1], na.rm = TRUE)
  # median_2 <- median(df[which(df$Count > 2), 1], na.rm = TRUE)

  # compare_1 <- gsub(
  #   "x",
  #   round(
  #     length(which(df$Age.Gr == "18-22" & df$Count < 3)) /
  #       (length(which(df$Age.Gr == "41-50" & df$Count < 3)) +
  #         length(which(df$Age.Gr == "31-40" & df$Count < 3))), 2
  #   ),
  #   "x:1"
  # )
  # compare_2 <- gsub(
  #   "x",
  #   round(
  #     length(which(df$Age.Gr == "18-22" & df$Count > 2)) /
  #       (length(which(df$Age.Gr == "41-50" & df$Count > 2)) +
  #         length(which(df$Age.Gr == "31-40" & df$Count > 2))), 2
  #   ),
  #   "x:1"
  # )

  # length(weight_65 <- which(df$Weight < 65 & df$Count < 3))
  # length(weight_66_70 <- which(df$Weight < 70 & df$Weight > 66 & df$Count < 3))
  # length(weight_71_80 <- which(df$Weight < 80 & df$Weight > 71  & df$Count < 3))
  # length(weight_81_90 <- which(df$Weight < 90 & df$Weight > 81  & df$Count < 3))
  # length(weight_90 <- which(df$Weight > 90 & df$Count < 3))

  # length(weight_65 <- which(df$Weight < 65 & df$Count > 2))
  # length(weight_66_70 <- which(df$Weight < 70 & df$Weight > 66 & df$Count > 2))
  # length(weight_71_80 <- which(df$Weight < 80 & df$Weight > 71 & df$Count > 2))
  # length(weight_81_90 <- which(df$Weight < 90 & df$Weight > 81 & df$Count > 2))
  # length(weight_90 <- which(df$Weight > 90 & df$Count > 2))

  # median(df[which(df$Count < 3), 3], na.rm = TRUE)
  # median(df[which(df$Count > 2), 3], na.rm = TRUE)

  # result <- data.frame(
  #   "Age 18-22" = c(age_18_22_1, age_18_22_2),
  #   "Age 23-30" = c(age_23_30_1, age_23_30_2),
  #   "Age 31-40" = c(age_31_40_1, age_31_40_2),
  #   "Age 41-50" = c(age_41_50_1, age_41_50_2),
  #   "Age 51-60" = c(age_51_60_1, age_51_60_2),
  #   "Median 50%" = c(median_1, median_2),
  #   "Compare 18-22/31-50" = c(compare_1, compare_2)
  # )

  # rownames(result) <- c("Less then 3", "More then 2")

  print(result)
  return(result)
}

my_table <- txt2table()
my_table

# sink("myfile.txt") # перенаправим вывод из stdout в файл myfile.txt
# txt2table()        # запустим функцию, которая что-то выводит
# sink()             # направим вывод назад в stdout