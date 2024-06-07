UPDATE TB_Profiles
SET TB_Profiles.sName = '', TB_Profiles.sEmail = '', TB_Profiles.sCellphone = '', TB_Profiles.sAddress = '', TB_Profiles.sUsername = '', TB_Profiles.sPassword = ''
WHERE TB_Profiles.vUUID = UNHEX('%s');