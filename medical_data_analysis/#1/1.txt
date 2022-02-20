length(age_18_22_1 <- which(df$Age.Gr == "18-22" & df$Count < 3))
length(age_23_30_1 <- which(df$Age.Gr == "23-30" & df$Count < 3))
length(age_31_40_1 <- which(df$Age.Gr == "31-40" & df$Count < 3))
length(age_41_50_1 <- which(df$Age.Gr == "41-50" & df$Count < 3))
length(age_51_60_1 <- which(df$Age.Gr == "51-60" & df$Count < 3))

length(age_18_22_2 <- which(df$Age.Gr == "18-22" & df$Count > 2))
length(age_23_30_2 <- which(df$Age.Gr == "23-30" & df$Count > 2))
length(age_31_40_2 <- which(df$Age.Gr == "31-40" & df$Count > 2))
length(age_41_50_2 <- which(df$Age.Gr == "41-50" & df$Count > 2))
length(age_51_60_2 <- which(df$Age.Gr == "51-60" & df$Count > 2))

median(df[which(df$Count < 3), 1], na.rm = TRUE)
median(df[which(df$Count > 2), 1], na.rm = TRUE)

gsub("x", round(length(age_18_22_1)/(length(age_41_50_1)+length(age_31_40_1)), 2), "x:1")
gsub("x", round(length(age_18_22_2)/(length(age_41_50_2)+length(age_31_40_2)), 2), "x:1")

length(weight_65 <- which(df$Weight < 65 & df$Count < 3))
length(weight_66_70 <- which(df$Weight < 70 & df$Weight > 66 & df$Count < 3))
length(weight_71_80 <- which(df$Weight < 80 & df$Weight > 71  & df$Count < 3))
length(weight_81_90 <- which(df$Weight < 90 & df$Weight > 81  & df$Count < 3))
length(weight_90 <- which(df$Weight > 90 & df$Count < 3))

length(weight_65 <- which(df$Weight < 65 & df$Count > 2))
length(weight_66_70 <- which(df$Weight < 70 & df$Weight > 66 & df$Count > 2))
length(weight_71_80 <- which(df$Weight < 80 & df$Weight > 71 & df$Count > 2))
length(weight_81_90 <- which(df$Weight < 90 & df$Weight > 81 & df$Count > 2))
length(weight_90 <- which(df$Weight > 90 & df$Count > 2))

median(df[which(df$Count < 3), 3], na.rm = TRUE)
median(df[which(df$Count > 2), 3], na.rm = TRUE)

# ar <- which((sapply(unique(df[,6]), nchar) > 0) == TRUE)

length(city_1 <- which(df$Localization == "город" & df$Count < 3))
length(village_1 <- which(df$Localization == "деревня " & df$Count < 3))

length(city_2 <- which(df$Localization == "город" & df$Count > 2))
length(village_2 <- which(df$Localization == "деревня " & df$Count > 2))

# unique(df[, 6], na.rm = TRUE)
mean(df[which(df$Count < 3), 5], na.rm = TRUE)
mean(df[which(df$Count > 2), 5], na.rm = TRUE)

length(sem_m_1<- which(df$Mstatus == "холост/незамужем" & df$Sex == "муж" & df$Count < 3))