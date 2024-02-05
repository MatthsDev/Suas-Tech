import sys
import os  # Adiciona a importação do módulo 'os'
import smtplib
from email.message import EmailMessage
import ssl

def obter_senha_de_forma_segura():
    senha = os.environ.get("SENHA_REMETENTE")
    
    if not senha:
        print("Erro: A senha do remetente não está configurada.")
        sys.exit(1)

    return senha

# Verifica se foram passados argumentos suficientes
if len(sys.argv) < 5:  # Modifica para 5 argumentos, pois agora temos 4 argumentos na linha de comando
    print("Erro: Número insuficiente de argumentos.")
    sys.exit(1)

# Obtém argumentos da linha de comando
arg1 = sys.argv[1]
arg2 = sys.argv[2]
arg3 = sys.argv[3]
arg4 = sys.argv[4]

print("Argumento 1:", arg1)
print("Argumento 2:", arg2)
print("Argumento 3:", arg3)
print("Argumento 4:", arg4)

remetente = "techsuas@gmail.com"
senha_remetente = obter_senha_de_forma_segura()
destinatario = arg1
assunto = "CREDENCIAIS PARA ACESSO DO SISTEMA TECH-SUAS"

corpo_email = f"""
<html>
<head></head>
<body>
    <p>Olá {arg2},</p>
    <p>Aqui estão as suas credenciais para acessar o sistema Tech-Suas:</p>
    <p>Usuário: {arg3}</p>
    <p>Senha: {arg4}</p>
    <p>Por favor, mantenha essas informações em segredo.</p>
    <p>Atenciosamente,<br>
        Tech-Suas</p>
</body>
</html>
"""

em = EmailMessage()
em['From'] = remetente
em['To'] = destinatario
em['Subject'] = assunto
em.set_content(corpo_email, subtype='html')

context = ssl.create_default_context()

with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
    smtp.starttls()
    smtp.login(remetente, senha_remetente)
    smtp.sendmail(remetente, destinatario, em.as_string())
