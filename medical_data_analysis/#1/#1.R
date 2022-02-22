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
  sex_comporation <- table(tb$Sex, tb$Count > 2)[-1, ]
  x1 <- c(
    paste0("1:", round(sex_comporation[1, 1] / sex_comporation[2, 1], 2)),
    paste0("1:", round(sex_comporation[1, 2] / sex_comporation[2, 2], 2))
  )

  x <- which(tb$Age.Gr == "18-22")
  sex_comporation <- table(tb$Sex[x], tb$Count[x] > 2)[-1, ]
  x2 <- c(
    paste0("1:", round(sex_comporation[1, 1] / sex_comporation[2, 1], 2)),
    paste0("1:", round(sex_comporation[1, 2] / sex_comporation[2, 2], 2))
  )

  x <- which(tb$Age.Gr == "31-40" | tb$Age.Gr == "41-50")
  sex_comporation <- table(tb$Sex[x], tb$Count[x] > 2)[-1, ]
  x3 <- c(
    paste0("1:", round(sex_comporation[1, 1] / sex_comporation[2, 1], 2)),
    paste0("1:", round(sex_comporation[1, 2] / sex_comporation[2, 2], 2))
  )

  ultratable <- data.frame(
    t(data.frame("муж/жен" = x1, "муж/жен 18-22" = x2, "муж/жен 31-50" = x3))
  )

  # Вес
  weight_65 <- table(tb$Weight < 66, tb$Count > 2)[-1, ]
  weight_66_70 <- table((tb$Weight > 65 & tb$Weight < 71), tb$Count > 2)[-1, ]
  weight_71_80 <- table((tb$Weight > 70 & tb$Weight < 81), tb$Count > 2)[-1, ]
  weight_81_90 <- table((tb$Weight > 80 & tb$Weight < 91), tb$Count > 2)[-1, ]
  weight_90 <- table(tb$Weight > 90, tb$Count > 2)[-1, ]
  weight <- rbind(
    weight_65,
    weight_66_70,
    weight_71_80,
    weight_81_90,
    weight_90
  )

  weight_median <- c(
    median(tb[which(tb$Count < 3), 3], na.rm = TRUE),
    median(tb[which(tb$Count > 2), 3], na.rm = TRUE)
  )
  weight <- rbind(weight, weight_median)

  # ИМТ
  bmi <- c(
    round(mean(tb[which(tb$Count < 3), 5], na.rm = TRUE), 2),
    round(mean(tb[which(tb$Count > 2), 5], na.rm = TRUE), 2)
  )

  # Проживание
  localization <- table(tb$Localization, tb$Count > 2)[-1, ]

  # Семейное положение
  x <- which(tb$Sex == "муж")
  male_status <- table(tb$Mstatus[x], tb$Count[x] > 2)[-1, ]

  y <- which(tb$Sex == "жен")
  female_status <- table(tb$Mstatus[y], tb$Count[y] > 2)[-1, ]

  comparation_m_status <- round(male_status / female_status, 2)

  m_comparation <- table(NULL)
  for (i in 1:nrow(comparation_m_status)) {
    m_comparation <- rbind(m_comparation,
      paste0("1:", comparation_m_status[i,], 2)
    )
  }

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
  result <- rbind(result, ultratable)
  result <- rbind(result, c("Пол", "Пол"))
  result <- rbind(result, bmi)
  result <- rbind(result, c("Индекс массы тела", "Индекс массы тела"))
  result <- rbind(result, weight)
  result <- rbind(result, localization)
  result <- rbind(result, c("Проживание", "Проживание"))
  result <- rbind(result, male_status)
  result <- rbind(result, c("Мужчины", "Мужчины"))
  result <- rbind(result, female_status)
  result <- rbind(result, c("Женщины", "Женщины"))
  result <- rbind(result, m_comparation)
  result <- rbind(result, c("Семейное положение", "Семейное положение"))
  result <- rbind(result, education)
  result <- rbind(result, c("Образование", "Образование"))
  result <- rbind(result, status)
  result <- rbind(result, c("Социальный статус", "Социальный статус"))
  result <- rbind(result, income)
  result <- rbind(result, c("Уровень доходов", "Уровень доходов"))

  colnames(result) <- c("Less then 3", "More then 2")

  colnames(localization) <- c("Less then 3", "More then 2")
  plot(localization)

  colnames(weight) <- c("Less then 3", "More then 2")
  plot(weight)

  return(result)
}

my_table <- txt2table()
my_table

# sink("myfile.txt") # перенаправим вывод из stdout в файл myfile.txt
# txt2table()        # запустим функцию, которая что-то выводит
# sink()             # направим вывод назад в stdout