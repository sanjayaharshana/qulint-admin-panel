# Environment Configuration

This document explains the environment variables needed for the Qulint Admin Panel.

## Required Environment Variables

### Database Configuration
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qulint_admin
DB_USERNAME=root
DB_PASSWORD=your_password
```

### AWS S3 Configuration (Optional)
If you want to use AWS S3 for file storage:
```env
AWS_ACCESS_KEY_ID=your-aws-access-key
AWS_SECRET_ACCESS_KEY=your-aws-secret-key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-s3-bucket
```

### Alibaba Cloud OSS Configuration (Optional)
If you want to use Alibaba Cloud OSS for file storage:
```env
ALIYUN_ACCESS_ID=your-aliyun-access-id
ALIYUN_ACCESS_KEY=your-aliyun-access-key
ALIYUN_BUCKET=your-oss-bucket
ALIYUN_ENDPOINT=oss-cn-shanghai.aliyuncs.com
```

### Qiniu Cloud Storage Configuration (Optional)
If you want to use Qiniu Cloud Storage:
```env
QINIU_ACCESS_KEY=your-qiniu-access-key
QINIU_SECRET_KEY=your-qiniu-secret-key
QINIU_BUCKET=your-qiniu-bucket
QINIU_DOMAIN=your-domain.clouddn.com
QINIU_HTTPS_DOMAIN=dn-yourdomain.qbox.me
QINIU_CUSTOM_DOMAIN=static.abc.com
QINIU_NOTIFY_URL=
```

## Security Notes

⚠️ **Important**: Never commit real credentials to your repository. Always use environment variables for sensitive information.

### What was fixed:
- Removed hardcoded Alibaba Cloud credentials from `tests/config/filesystems.php`
- Removed hardcoded Qiniu credentials from `tests/config/filesystems.php`
- Updated all cloud storage configurations to use environment variables
- Added comprehensive `.gitignore` rules to prevent future credential leaks

### Best Practices:
1. Use environment variables for all sensitive data
2. Never commit `.env` files to version control
3. Use `.env.example` files with placeholder values
4. Regularly rotate your cloud storage credentials
5. Use least-privilege access policies for cloud services
